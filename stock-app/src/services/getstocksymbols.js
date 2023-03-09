import {useState, useEffect} from 'react';




export const GetStockSymbols = () =>{
  
     const [error, setError] = useState(null);
  //   const [isLoaded, setLoaded] = useState(false);
     const [items, setItems] = useState([]);
    //load symbols once component is rendered 
      useEffect(() => {
        fetch("http://localhost/stock_app_backend/api/stocks_api/read")
          .then(res => res.json())
          .then(
            (result) => {
            //   setLoaded(true);
                setItems(result.records);
               // console.log(result.records);
               //console.log(1);
             },
            // Note: it's important to handle errors here
            // instead of a catch() block so that we don't swallow
            // exceptions from actual bugs in components.
            (error) => {
          //    setLoaded(true);
              setError(error);
            }
          )
      },[]);
  
     // return items; 
    
    
     
      //const { error, isLoaded, items } = this.state;
        if (error) {
          return error.message;
        } else {
          return items
        }

}; 

