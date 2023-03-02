import React, { forwardRef, useImperativeHandle, useRef } from "react";
import { createRoot } from "react-dom/client";
import Child from './alert.js';


const Parent = () => {
  const ref = useRef();

  return (
    <div>
      <Child ref={ref} />
      <button onClick={() => ref.current.log()}>Click</button>
    </div>
  );
};


export default Parent ;