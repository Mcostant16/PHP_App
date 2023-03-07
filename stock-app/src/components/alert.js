import React, { forwardRef, useImperativeHandle, useRef } from "react";
import { createRoot } from "react-dom/client";
import { confirmAlert } from "react-confirm-alert";
import "react-confirm-alert/src/react-confirm-alert.css";
import {PostSymbolHistory} from "../services/indexservices.js";

const Alert = forwardRef((props, ref) => {
  useImperativeHandle(ref, () => ({
    log(message) {
      console.log("child function");
      confirmAlert({
        title: "Confirm to submit",
        message: message,
        buttons: [
          {
            label: "Yes",
            onClick: () => PostSymbolHistory() //alert("Click Yes")
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