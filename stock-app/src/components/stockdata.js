import {GetStockHistory} from '../services/getstockhistory.js';
import Card from 'react-bootstrap/Card';

function StockData(props) {

    const items = GetStockHistory(props.symbol);  
       //console.log(items); 
        return ( 
            <>
            {    
                items.slice(0,26).map((stockInfo,index) => (
                    
                    <center key={index}>
                        <Card
                        bg={'primary'}
                        style={{ width: '18rem' }}
                        key={index}>
                        <div> 
                        <h1>{stockInfo.Symbol}</h1>
                            <div>{stockInfo.Date}</div>
                            <div>{stockInfo.Open}</div>
                            <div>{stockInfo.Adj_Close}</div>
                            <div>{stockInfo.Volume}</div>
                            <div>{stockInfo.Interval_Time}</div>
                        </div>
                        </Card>
                        </center>

                ))
            }
            </>
        );



}

export default StockData;