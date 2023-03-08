import RetrievePostHistory from './posthistoryservice.js';
import DeleteHistory from "./deletehistoryservice";

export const PostSymbolHistory = (symbol) =>{

    RetrievePostHistory(symbol);
    
}

export const DeleteSymbolHistory = (symbol) =>{

    DeleteHistory(symbol);
    
}