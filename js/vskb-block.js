"use strict";

(function () {
	var _wp = wp,
	registerBlockType = _wp.blocks.registerBlockType,
	createElement = _wp.element.createElement,
	serverSideRender = _wp.serverSideRender === void 0 ? _wp.components.serverSideRender : _wp.serverSideRender,
	InspectorControls = _wp.blockEditor.InspectorControls,
	PanelBody = _wp.components.PanelBody,
	SelectControl = _wp.components.SelectControl,
	TextareaControl = _wp.components.TextareaControl,
	Placeholder = _wp.components.Placeholder,
	Button = _wp.components.Button;

	registerBlockType('vskb/vskb-block', {
		title: 'VS Knowledge Base',
		icon: 'book',
		category: 'text',
		attributes: {
			listType: {
				type: 'string'
			},
			shortcodeSettings: {
				type: 'string'
			},
			noNewChanges: {
				type: 'boolean'
			},
			executed: {
				type: 'boolean'
			}
		},
		edit: function edit(props) {
			var _props = props,
			setAttributes = _props.setAttributes,
			attributes = _props.attributes,
			attributes$lis = attributes.listType,
			listType = attributes$lis === void 0 ? null : attributes$lis,
			listOptions = vskb_block_l10n.listTypes.map( value => (
				{ value: value.id, label: value.label }
			) ),
			attributes$sho = attributes.shortcodeSettings,
			shortcodeSettings = attributes$sho === void 0 ? null : attributes$sho,
			attributes$cli = attributes.noNewChanges,
			noNewChanges = attributes$cli === void 0 ? true : attributes$cli,
			attributes$exe = attributes.executed,
			executed = attributes$exe === void 0 ? false : attributes$exe;

			function selectType(value) {
				setAttributes({
					listType: value
				});
			}

			function setState(shortcodeSettingsContent) {
				setAttributes({
					noNewChanges: false,
					shortcodeSettings: shortcodeSettingsContent
				});
			}

			function previewClick(content) {
				setAttributes({
					noNewChanges: true,
					executed: false
				});
			}

			function afterRender() {
				setAttributes({
					executed: true
				});
			}

			var jsx;

			jsx = [React.createElement(InspectorControls, {
					key: "vskb-block-editor-inspector-controls"
				},
				React.createElement(PanelBody, {
					key: "vskb-block-editor-panel-body",
					title: vskb_block_l10n.addSettings
				},
				React.createElement(SelectControl, {
					key: "vskb-block-editor-select",
					label: vskb_block_l10n.listTypeLabel,
					value: listType,
					options: listOptions,
					onChange: selectType
				}),
				React.createElement(TextareaControl, {
					key: "vskb-block-editor-textarea",
					label: vskb_block_l10n.shortcodeSettingsLabel,
					help: vskb_block_l10n.example + ": posts_per_category=\"5\"",
					value: shortcodeSettings,
					onChange: setState
				}),
				React.createElement('div', {
					key: "vskb-block-editor-preview-button-div",
					className: "components-base-control"
				},
				React.createElement(Button, {
					key: "vskb-block-editor-preview-button-primary",
					onClick: previewClick,
					isSecondary: true
				}, vskb_block_l10n.previewButton
				)
				),
				React.createElement('div', {
					key: "vskb-block-editor-info-div",
					className: "components-base-control"
				}, vskb_block_l10n.linkText + " "
				,
				React.createElement('a', {
					key: "vskb-block-editor-info-link",
					href: "https://wordpress.org/plugins/very-simple-knowledge-base",
					rel: "noopener noreferrer",
					target: "_blank"
				}, vskb_block_l10n.linkLabel
				)
				)
				)
			)];

			if (noNewChanges) {
				afterRender();
				jsx.push(React.createElement(serverSideRender, {
					key: "vskb-block-editor-server-side-render",
					block: "vskb/vskb-block",
					attributes: props.attributes
				}));
			} else {
				props.attributes.noNewChanges = false;
				jsx.push(React.createElement(Placeholder, {
					key: "vskb-block-editor-placeholder"
				}, React.createElement(Button, {
					key: "vskb-block-editor-preview-button-secondary",
					onClick: previewClick,
					isSecondary: true
				}, vskb_block_l10n.previewButton
				)
				));
			}

			return jsx;
		},
		save: function save() {
			return null;
		}
	});
})();
