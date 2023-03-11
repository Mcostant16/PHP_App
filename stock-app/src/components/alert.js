import React, { forwardRef, useImperativeHandle, useRef } from "react";
import { createRoot } from "react-dom/client";
import { confirmAlert } from "react-confirm-alert";
import "react-confirm-alert/src/react-confirm-alert.css";

const Alert = forwardRef((props, ref) => {
  useImperativeHandle(ref, () => ({
    log(message, func, symbol) {
       console.log("child function");
      confirmAlert({
        title: "Confirm to submit",
        message: message,
        buttons: [
          {
            label: "Yes",
            //call the function that was passed with the correct key
            onClick: () => func(symbol)
                //console.log("how Mmany Times")
             //PostSymbolHistory(symbol) //alert("Click Yes")
          },
          {
            label: "No"
            // onClick: () => alert("Click No")
          }
        ]
      });
    }
  }));

  return <div></div>;
});




export default Alert;