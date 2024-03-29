import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";

/* Edit is where you’ll build the block admin interface */

function Edit(props) {
  function setExampleAttribute(e) {
    props.setAttributes({ exampleAttribute: e.target.value });
  }

  return (
    <div {...useBlockProps()}>
      <div>
        <h3>Base Gutenberg Block</h3>
        <p>Type the attribute value below</p>
        <input
          type="text"
          value={props.attributes.exampleAttribute}
          onChange={setExampleAttribute}
          placeholder="Attribute value that will be displayed in the frontend"
        />
      </div>
    </div>
  );
}

export default Edit;
