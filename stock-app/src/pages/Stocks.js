import MyComponent from '../api/getAPI';
import './stocks.css';



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
        <h1>Who lives in my Garage?</h1>
        <Search />
        <MyComponent />
       

      </>
    );
  }

  export default Stocks;