
import { Link } from 'react-router-dom';
import Card from 'react-bootstrap/Card';
import Button from 'react-bootstrap/Button';
import {GetStockSymbols} from '../services/getstocksymbols';
function StockInfo() {

const items = GetStockSymbols();  

//console.log(items); 

    const stockpage1 = [
        {
          name: `Apple`,
        },
        {
          name: `Vennila`,
        },
        {
          name: `Afrin`,
        },
      ];
     
      return (
      <>
      {
      items.map((stockInfo,index) => (
       // <div key={index}>

<Link

/* Below is the page path with an interpolated string where 
fishInfo.fishPath is the dynamic bit which is being used to 
generated each page's unqiue url from the array the pre-fixed main 
path stays the same */

        to={`/stockinfo/${stockInfo.name}`}
        state={{ stockpage1 }}
        key={index}
      >
        <Card
          source={stockInfo.name}
          key={index}
          style={{ width: '18rem' }}
        >
         <Card.Img variant="top" src="holder.js/100px180" />
      <Card.Body>
        <Card.Title>{stockInfo.name}</Card.Title>
        <Card.Text>
          Some quick example text to build on the card title and make up the
          bulk of the card's content.
        </Card.Text>
        <Button variant="primary">Go somewhere</Button>
      </Card.Body>
    </Card>
      </Link>
   // </div>
      ))
    }
      </>
    );
  }

  export default StockInfo;