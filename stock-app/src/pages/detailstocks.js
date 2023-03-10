import React, {useState, useEffect} from 'react';
import { useParams } from 'react-router-dom';
import { Link } from 'react-router-dom';
import Example from '../components/linecharts.js';

export default function Apple() {

 const params = useParams();
 console.log(params);
    return(
     <div> 
    <div> Hello Apple {params.symbol}</div>
    <Link to={'/stocks'} className="btn btn-primary">Back</Link>
    <Example/>
    </div> 
    )
}
