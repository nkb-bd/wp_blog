import { createElement, useMemo, useEffect } from '@wordpress/element'
import OptionsPanel from '../OptionsPanel'
import { normalizeCondition, matchValuesWithCondition } from 'match-conditions'
import { useDeviceManagerState } from '../../customizer/components/useDeviceManager'

import useForceUpdate from './use-force-update'

const Condition = ({
	renderingChunk,
	value,
	onChange,
	purpose,
	parentValue,
	hasRevertButton,
}) => {
	const forceUpdate = useForceUpdate()
	const { currentView } = useDeviceManagerState()

	useEffect(() => {
		renderingChunk.map(
			(conditionOption) =>
				conditionOption.global &&
				Object.keys(conditionOption.condition).map((key) =>
					wp.customize(key, (val) =>
						val.bind((to) => setTimeout(() => forceUpdate()))
					)
				)
		)
	}, [])

	return renderingChunk.map((conditionOption) => {
		let valueForCondition = null

		if (conditionOption.values_source === 'global') {
			let conditionToWatch = {
				...conditionOption.condition,
				...(conditionOption.perform_replace
					? conditionOption.perform_replace.condition
					: {}),
			}

			valueForCondition = Object.keys(conditionToWatch).reduce(
				(current, key) => ({
					...current,
					[key]: wp.customize(key)(),
				}),
				{}
			)
		}

		if (conditionOption.values_source === 'parent') {
			valueForCondition = parentValue
		}

		if (!valueForCondition) {
			valueForCondition = {
				...value,
				wp_customizer_current_view: currentView,
			}
		}

		if (conditionOption.perform_replace) {
			let conditionReplaceMatches = matchValuesWithCondition(
				normalizeCondition(conditionOption.perform_replace.condition),
				valueForCondition
			)

			if (
				conditionReplaceMatches &&
				valueForCondition[conditionOption.perform_replace.key] &&
				valueForCondition[conditionOption.perform_replace.key] ===
					conditionOption.perform_replace.from
			) {
				valueForCondition[conditionOption.perform_replace.key] =
					conditionOption.perform_replace.to
			}
		}

		let conditionMatches = matchValuesWithCondition(
			normalizeCondition(conditionOption.condition),
			valueForCondition
		)

		return conditionMatches ? (
			<OptionsPanel
				purpose={purpose}
				key={conditionOption.id}
				onChange={onChange}
				options={conditionOption.options}
				value={value}
				hasRevertButton={hasRevertButton}
				parentValue={parentValue}
			/>
		) : (
			[]
		)
	})
}

export default Condition
