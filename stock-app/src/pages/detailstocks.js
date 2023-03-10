import React, {useState, useEffect} from 'react';
import { useParams } from 'react-router-dom';
import { Link } from 'react-router-dom';
import Example from '../components/linecharts.js';
import StockData from '../components/stockdata.js';

export default function Apple() {

 const params = useParams();
    return(
     <div> 
    <div> Hello Apple {params.symbol}</div>
    <Link to={'/stocks'} className="btn btn-primary">Back</Link>
    <Example symbol={params.symbol} />
    <StockData symbol={params.symbol}/>
    </div> 
    )
}
