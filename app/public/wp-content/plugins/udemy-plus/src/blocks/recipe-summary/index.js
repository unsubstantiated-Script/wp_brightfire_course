import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { useEntityProp } from '@wordpress/core-data'
import { useSelect } from '@wordpress/data'
import icons from '../../icons.js';
import './main.css';

registerBlockType('udemy-plus/recipe-summary', {
    icon: {
        src: icons.primary
    },
    edit({ attributes, setAttributes, context }) {
        const { prepTime, cookTime, course } = attributes;
        const blockProps = useBlockProps();
        const { postId } = context;

        const [termIDs] = useEntityProp('postType', 'recipe', 'cuisine', postId)

        //Reminds me of useEffect in the React library...but selection based vs. lifecycle based
        //Actually some Redux going on here...
        // A WP style query
        const { cuisines } = useSelect((select) => {
            const { getEntityRecords } = select('core')
            return {
                cuisines: getEntityRecords('taxonomy', 'cuisine', {
                    include: termIDs
                })
            }
        }, [termIDs])

        console.log(cuisines)


        return (
            <>
                <div { ...blockProps }>
                    <i className="bi bi-alarm"></i>
                    <div className="recipe-columns-2">
                        <div className="recipe-metadata">
                            <div className="recipe-title">{ __('Prep Time', 'udemy-plus') }</div>
                            <div className="recipe-data recipe-prep-time">
                                <RichText
                                    tagName="span"
                                    value={ prepTime }
                                    onChange={ prepTime => setAttributes({ prepTime }) }
                                    placeholder={ __('Prep time', 'udemy-plus') }
                                />
                            </div>
                        </div>
                        <div className="recipe-metadata">
                            <div className="recipe-title">{ __('Cook Time', 'udemy-plus') }</div>
                            <div className="recipe-data recipe-cook-time">
                                <RichText
                                    tagName="span"
                                    value={ cookTime }
                                    onChange={ cookTime => setAttributes({ cookTime }) }
                                    placeholder={ __('Cook time', 'udemy-plus') }
                                />
                            </div>
                        </div>
                    </div>
                    <div className="recipe-columns-2-alt">
                        <div className="recipe-columns-2">
                            <div className="recipe-metadata">
                                <div className="recipe-title">{ __('Course', 'udemy-plus') }</div>
                                <div className="recipe-data recipe-course">
                                    <RichText
                                        tagName="span"
                                        value={ course }
                                        onChange={ course => setAttributes({ course }) }
                                        placeholder={ __('Course', 'udemy-plus') }
                                    />
                                </div>
                            </div>
                            <div className="recipe-metadata">
                                <div className="recipe-title">{ __('Cuisine', 'udemy-plus') }</div>
                                <div className="recipe-data recipe-cuisine">
                                </div>
                            </div>
                            <i className="bi bi-egg-fried"></i>
                        </div>
                        <div className="recipe-metadata">
                            <div className="recipe-title">{ __('Rating', 'udemy-plus') }</div>
                            <div className="recipe-data">
                            </div>
                            <i className="bi bi-hand-thumbs-up"></i>
                        </div>
                    </div>
                </div>
            </>
        );
    }
});