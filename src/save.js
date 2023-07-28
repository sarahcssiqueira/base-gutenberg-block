import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";

/* Save is where we build the block structure to be saved into the database */
function Save(props) {
  return (
    <p {...useBlockProps.save()}>
      {__(<div>{props.attributes.exampleAttribute}</div>)}
    </p>
  );
}

export default Save;
