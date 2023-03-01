import React from 'react';
import Table from 'react-bootstrap/Table';
import '../App.css';
//import 'react-bootstrap-table-next/dist/react-bootstrap-table2.min.css';
//import BootstrapTable from "react-bootstrap-table-next";
//import paginationFactory from "react-bootstrap-table2-paginator";
import MaterialTable from 'material-table';
import tableIcons  from '../components/materialicons.js';
import { ThemeProvider, createTheme } from '@mui/material';

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

export default class MyComponent extends React.Component {
    constructor(props) {
      super(props);
      this.state = {
        error: null,
        isLoaded: false,
        items: []
      };
    }
  
 
    componentDidMount() {
      fetch("http://localhost/stock_app_backend/api/stocks/read.php")
        .then(res => res.json())
        .then(
          (result) => {
            this.setState({
              isLoaded: true,
              items: result.records
            });
          },
          // Note: it's important to handle errors here
          // instead of a catch() block so that we don't swallow
          // exceptions from actual bugs in components.
          (error) => {
            this.setState({
              isLoaded: true,
              error
            });
          }
        )
    }
  
    render() {
      const { error, isLoaded, items } = this.state;
      if (error) {
        return <div>Error: {error.message}</div>;
      } else if (!isLoaded) {
        return <div>Loading...</div>;
      } else {
        return (
            <div className='bt-Table2'>
          <h1>API Table</h1>
          <ThemeProvider theme={defaultMaterialTheme}>
          <MaterialTable
           title="Demo Title"
           icons={tableIcons}
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
  }

