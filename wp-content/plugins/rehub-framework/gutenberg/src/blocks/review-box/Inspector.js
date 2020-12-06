/**
 * WordPress dependencies
 */
import {__} from '@wordpress/i18n';
import {Component} from '@wordpress/element'
import {InspectorControls} from '@wordpress/block-editor';
import {PanelBody, TextControl, TextareaControl, ColorPicker, BaseControl, Button} from '@wordpress/components';

/**
 * Internal dependencies
 */
import AdvancedRangeControl from '../../components/advanced-range-control';
import ConsProsInspector from '../../components/cons-pros/inspector';
import CardList from '../../components/card-list';

/**
 * External dependencies
 */
import {cloneDeep} from 'lodash';

/**
 * Create an Inspector Controls wrapper Component
 */
export default class Inspector extends Component {
	render() {
		const {attributes, setAttributes} = this.props;
		const {title, description, score, mainColor, criterias, prosTitle, positives, consTitle, negatives} = attributes;

		return (
			<InspectorControls>
				<PanelBody title={__('General', 'rehub-framework')} initialOpen={true}>
					<TextControl
						label={__('Title', 'rehub-framework')}
						value={title}
						placeholder={__('Awesome', 'rehub-framework')}
						onChange={(value) => {
							setAttributes({title: value})
						}}
					/>
					<TextareaControl
						label={__('Description', 'rehub-framework')}
						placeholder={__('Place here Description for your reviewbox', 'rehub-framework')}
						value={description}
						onChange={(value) => {
							setAttributes({description: value})
						}}
					/>
					<AdvancedRangeControl
						label={__('Score Value', 'rehub-framework')}
						value={score}
						min="0"
						max="10"
						step={0.5}
						onChange={(value) => {
							setAttributes({score: value})
						}}
					/>
					<BaseControl
						className='rri-advanced-range-control'
						label={__('Set background color or leave blank', 'rehub-framework')}>
						<ColorPicker
							color={mainColor}
							onChangeComplete={(value) => {
								setAttributes({mainColor: value.hex})
							}}
							disableAlpha
						/>
					</BaseControl>
				</PanelBody>
				<PanelBody title={__('Criterias', 'rehub-framework')} initialOpen={false}>
					<CardList
						items={criterias}
						propName='criterias'
						setAttributes={setAttributes}
						titlePlaceholder={__('Criteria name', 'rehub-framework')}
						includeValueField
					/>
					<BaseControl className='rri-advanced-range-control text-center'>
						<Button isSecondary onClick={() => {
							const criteriasClone = cloneDeep(criterias);
							criteriasClone.push({
								title: __('Criteria name', 'rehub-framework'),
								value: 10
							});
							setAttributes({criterias: criteriasClone})
						}}>
							{__('Add Item', 'rehub-framework')}
						</Button>
					</BaseControl>
				</PanelBody>
				<ConsProsInspector
					setAttributes={setAttributes}
					prosTitle={prosTitle}
					positives={positives}
					consTitle={consTitle}
					negatives={negatives}
				/>
			</InspectorControls>
		);
	}
}