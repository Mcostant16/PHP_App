import MyComponent from '../api/getAPI';
import './stocks.css';
import MaterialDetail from '../components/stockdetail.js';



function Search() {
   return ( 
  <div className="search-box">
   <h2>Welcome to stock App!</h2>
  <br/>
  <br/>
  <p>Select a Stock Ticker</p>
  <h2>Search Stock Info</h2>
  <form className="example" action="index.php" method="get">
    <input type="text" placeholder="Search.." name="searchFor"/>
    <button type="submit"><i className="fa fa-search"></i></button>
    <input name="content" type="hidden" value="search" />
  </form>
</div>
)
}

  function Stocks() {
    return (
      <>
       <center>
         <h1>Upload or Delete Stock History</h1>
       </center>
       {/* Commented Out
        <Search/>
                */}
        <MaterialDetail  name="Sara"/>
        <MyComponent/>
       

      </>
    );
  }

  export default Stocks;