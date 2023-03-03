import {React, useState, useEffect} from 'react';
import { forwardRef, useImperativeHandle, useRef } from "react";
import Table from 'react-bootstrap/Table';
import '../App.css';
import Alert from '../components/alert.js';

//import 'react-bootstrap-table-next/dist/react-bootstrap-table2.min.css';
//import BootstrapTable from "react-bootstrap-table-next";
//import paginationFactory from "react-bootstrap-table2-paginator";
import MaterialTable from 'material-table';
import tableIcons  from '../components/materialicons.js';
import { ThemeProvider, createTheme } from '@mui/material';
import Child from '../components/alert.js';

//const { forwardRef, useRef, useImperativeHandle } = React;

const defaultMaterialTheme = createTheme({
  palette: {
    mode:'dark'
  }
});



const columns = [
  {
    dataField: "id",
    text: "Stock ID",
    sort: true
  },
  {
    dataField: "name",
    text: "Stock Name",
    sort: true
  },
  {
    dataField: "Volume",
    text: "Volume"
  }
];   



export default function MyComponent (){
  const ref = useRef();
    
   const [error, setError] = useState(null);
   const [isLoaded, setLoaded] = useState(false);
   const [items, setItems] = useState([]);
 
    useEffect(() => {
      fetch("http://localhost/stock_app_backend/api/stocks/read.php")
        .then(res => res.json())
        .then(
          (result) => {
             setLoaded(true);
              setItems(result.records);
           },
          // Note: it's important to handle errors here
          // instead of a catch() block so that we don't swallow
          // exceptions from actual bugs in components.
          (error) => {
            setLoaded(true);
            setError(error);
          }
        )
    });


  
  
    //  const { error, isLoaded, items } = this.state;
      if (error) {
        return <div>Error: {error.message}</div>;
      } else if (!isLoaded) {
        return <div>Loading...</div>;
      } else {
        return (
            <div className='bt-Table2'>
             
          <h1>API Table</h1>
          <Alert ref={ref} />
          
       
          <ThemeProvider theme={defaultMaterialTheme}>
          <MaterialTable
           title="Demo Title"
           icons={tableIcons}
           actions={[
            {
              icon: tableIcons.Delete,
              tooltip: "Delete User",
              onClick: (event, rowData) => {ref.current.log("Delete Stock: " + rowData.name)},
            },
            {
              icon: tableIcons.Add,
              tooltip: "Add User",
              isFreeAction: true,
              onClick: (event) => {"You want to add a new row."},
            },
          ]}
          columns={[
            { title: 'ID', field: 'id' },
            { title: 'Name', field: 'name' },
            { title: 'Volume', field: 'Volume', type: 'numeric' },
            { title: 'Industry', field: 'industry' }
          ]}
          data={items}
         />
        </ThemeProvider> 
      </div>
       );
      }
    }
  

