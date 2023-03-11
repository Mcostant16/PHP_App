//import {React, useState} from 'react';
import React from 'react';
import { toast } from 'react-toastify';

function RetrievePostHistory(symbol) {
 //   const [error, setError] = useState(null);
//    const [isLoaded, setLoaded] = useState(false);
 //   const [items, setItems] = useState([]);
 console.log("Outside of Fetch");
 var Hello = "hello";
 var People = "People";
fetch(`http://localhost/stock_app_backend/api/getHistory?symbol=${encodeURIComponent(symbol)}`, {

    method: 'POST',
     headers: {
            'Content-type': 'application/json; charset=UTF-8',
         },
         body: JSON.stringify({
            title: Hello,
            body: People,
            userId: Math.random().toString(36).slice(2),
         }),
        
}).then(res => {
    if (!res.ok) {
        throw new Error(`HTTP error! Status: ${res.status}`);
      } else {
         console.log(`Success: ${res.status}`);
         toast.success(`Stock Hostory Successfully Uploaded for ${symbol}!`, { theme: "colored" });

      }
      return res.json();
    })
        .then(
          (result) => {
           //  setLoaded(true);
           //   setItems(result.records);
           //console.log(result);
           },
          // Note: it's important to handle errors here
          // instead of a catch() block so that we don't swallow
          // exceptions from actual bugs in components.
          (error) => {
           // setLoaded(true);
          console.log(error);
          }
        )
    
}

export default RetrievePostHistory;