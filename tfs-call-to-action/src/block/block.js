/**
 * BLOCK: tfs-call-to-action
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import classnames from 'classnames';
import './style.scss';
import './editor.scss';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
const {
	RichText,
	AlignmentToolbar,
	BlockControls,
	BlockAlignmentToolbar,
	PlainText
} = wp.editor;

export default registerBlockType(
	'cgb/block-call-to-action',
	{
		title: __( 'call-to-action' ),
		icon: 'shield',
		category: 'common',
		keywords: [
			__( 'call-to-action' ),
			__( 'create-guten-block' ),
		],
		attributes: {
			title: {
				source: 'text',
				selector: '.block__title'
			},
			message: {
				type: 'array',
				source: 'children',
				selector: '.message-body',
			},
			textAlignment: {
				type: 'string',
			},
			blockAlignment: {
				type: 'string',
				default: 'wide',
			},
		},
		getEditWrapperProps( { blockAlignment } ) {
			if ( 'left' === blockAlignment || 'right' === blockAlignment  || 'full' === blockAlignment ) {
				return { 'data-align': blockAlignment };
			}
		},

		edit: function( props ) {
			const { attributes: { textAlignment, blockAlignment, message, title }, className, setAttributes } = props;
			const onChangeMessage = message => { setAttributes( { message } ) };
			const onChangeTitle	= title => { setAttributes( { title } ) };


			// Creates a <p class='wp-block-cgb-block-call-to-action'></p>.
			return (
				<div className={ props.className }>
					<BlockControls>
						<BlockAlignmentToolbar
							value={ blockAlignment }
							onChange={ blockAlignment => setAttributes( { blockAlignment } ) }
						/>
						<AlignmentToolbar
							value={ textAlignment }
							onChange={ textAlignment => setAttributes( { textAlignment } ) }
						/>
					</BlockControls>
					<PlainText
						tagName="div"
						placeholder={ __('Your title here') }
						className="block__title"
						value={ title }
						style={ { textAlign: textAlignment } }
						onChange={ onChangeTitle }
					/>
					<RichText
						tagName="div"
						multiline="p"
						placeholder={ __( 'Add your CTA here' ) }
						value={ message }
						style={ { textAlign: textAlignment } }
						onChange={ onChangeMessage }
					/>
				</div>
			);
		},

		save: function( props ) {
			const { blockAlignment, textAlignment, title,  message } = props.attributes;
			return (
					<div className={classnames(
						`align${blockAlignment}`,
						'cta-container',
					)} >
				<div
					className={classnames(
						`align${blockAlignment}`,
						'block__title',
					)}
					style={ { textAlign: textAlignment } }
				>
					<h3>{ title }</h3>
				</div>
				<div
					className={classnames(
						'message-body',
					)}
					style={ { textAlign: textAlignment } }
				>
					{ message }
				</div>
				</div>
			);
		},
	},
);
