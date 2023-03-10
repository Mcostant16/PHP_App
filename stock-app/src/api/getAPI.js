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
import MaterialDetail from '../components/stockdetail.js';
import {PostSymbolHistory, DeleteSymbolHistory} from "../services/indexservices.js";
//const { forwardRef, useRef, useImperativeHandle } = React;

const defaultMaterialTheme = createTheme({
  palette: {
    mode:'dark'
  }
});



export default function MyComponent (){
  const ref = useRef();
  const [data, setData] = useState([]);
   const [error, setError] = useState(null);
   const [isLoaded, setLoaded] = useState(false);
   const [items, setItems] = useState([]);
  //load symbols once component is rendered 
    useEffect(() => {
      fetch("http://localhost/stock_app_backend/api/stocks_api/read")
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
    },[]);


  
  
    //  const { error, isLoaded, items } = this.state;
      if (error) {
        return <div>Error: {error.message}</div>;
      } else if (!isLoaded) {
        return <div>Loading...</div>;
      } else {
        return (
            <div className='bt-Table2'>
          <Alert ref={ref} />
          
       
          <ThemeProvider theme={defaultMaterialTheme}>
          <MaterialTable
           title="Stock History"
           icons={tableIcons}
           actions={[
            {
              icon: tableIcons.Delete,
              tooltip: "Delete User",
              onClick: (event, rowData) => {ref.current.log("Delete Stock: " + rowData.name,DeleteSymbolHistory,rowData.id)},
            },
            {
              icon: tableIcons.Add,
              tooltip: "Add Stock History",
              //onclick call the alert component method current.log and pass it the message along with the method to add stock historical data
              onClick: (event, rowData) => {ref.current.log("Add Stock History: " + rowData.name,PostSymbolHistory,rowData.id)},
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
          options={{actionsColumnIndex: -1, detailPanelType: "single" }}
          detailPanel={(rowData) => {
            return (<MaterialDetail {...rowData} />);
              }}
          onRowClick={(event, rowData, togglePanel) => {
            // Copy row data and set checked state
            togglePanel();
            const rowDataCopy = { ...rowData };
            console.log(rowData.name);
            rowDataCopy.tableData.checked = !rowDataCopy.tableData.checked;
            // Copy data so we can modify it
            const dataCopy = [...data];
            // Find the row we clicked and update it with `checked` prop
            dataCopy[rowDataCopy.tableData.id] = rowDataCopy;
            setData(dataCopy);
          }}
         />
        </ThemeProvider> 
      </div>
       );
      }
    }
  

