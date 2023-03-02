import React, { forwardRef, useImperativeHandle, useRef } from "react";
import { createRoot } from "react-dom/client";
import { confirmAlert } from "react-confirm-alert";
import "react-confirm-alert/src/react-confirm-alert.css";

const Alert = forwardRef((props, ref) => {
  useImperativeHandle(ref, () => ({
    log() {
      console.log("child function");
      confirmAlert({
        title: "Confirm to submit",
        message: 'Hello this is a message',
        buttons: [
          {
            label: "Yes",
            onClick: () => alert("Click Yes")
          },
          {
            label: "No"
            // onClick: () => alert("Click No")
          }
        ]
      });
    }
  }));

  return <></>;
});




export default Alert;