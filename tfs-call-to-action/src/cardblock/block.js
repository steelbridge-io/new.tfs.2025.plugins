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
const { Button } = wp.components;
const {
	RichText,
	MediaUpload,
	PlainText
} = wp.editor;

registerBlockType(
	'cgb/card',
	{
		// Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
		title: __( 'Card' ), // Block title.
		icon: 'heart', // Block icon from Dashicons →
		// https://developer.wordpress.org/resource/dashicons/.
		category: 'common', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
		keywords: [
			__( 'card block' ),
			__( 'card block' ),
			__( 'create-guten-block' ),
		],
		attributes: {
			title: {
				source: 'text',
				selector: '.card__title'
			},
			body: {
				type: 'array',
				source: 'children',
				selector: '.card__body'
			},
			imageAlt: {
				attribute: 'alt',
				selector: '.card__image'
			},
			imageUrl: {
				attribute: 'src',
				selector: '.card__image'
			},
		},

		edit({ attributes, className, setAttributes }) {

			const getImageButton = (openEvent) => {
				if(attributes.imageUrl) {
					return (
						<img
							src={ attributes.imageUrl }
							onClick={ openEvent }
							className="image"
						/>
					);
				}
				else {
					return (
						<div className="button-container">
							<Button
								onClick={ openEvent }
								className="button button-large"
							>
								Pick and image
							</Button>
						</div>
					);
				}
			};

			return (
				<div className="container">
					<MediaUpload
						onSelect={ media => { setAttributes({ imageAlt: media.alt, imageUrl: media.url }); } }
						type="image"
						value={ attributes.imageID }
						render={ ({ open }) => getImageButton(open) }
					/>
					<PlainText
						onChange={ content => setAttributes({ title: content }) }
						value={ attributes.title }
						placeholder="Your title here"
						className="heading"
					/>
					<RichText
						onChange={ content => setAttributes({ body: content }) }
						value={ attributes.body }
						multiline="p"
						placeholder="Your card text"
					/>
				</div>
			);
		},

		save({ attributes }) {
			const cardImage = (src, alt) => {
				if(!src) return null;

				if(alt) {
					return (
						<img
							className="card__image"
							src={ src }
							alt={ alt }
						/>
					);
				}
				// No alt set, so let's hide it from screen readers
				return (
					<img
						className="card__image"
						src={ src }
						alt=""
						aria-hidden="true"
					/>
				);
			};
			return (
				<div className="card">
					{ cardImage(attributes.imageUrl, attributes.imageAlt) }
					<div className="card__content">
						<h3 className="card__title">{ attributes.title }</h3>
						<div className="card__body">
							{ attributes.body }
						</div>
					</div>
				</div>
			);
		}



	}, // Register Block Type
); // Register Block Type
