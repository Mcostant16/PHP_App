import { Link } from 'react-router-dom';
import { useNavigate } from "react-router-dom";
export default function MaterialDetail(prop) {
    let navigate = useNavigate(); 
    const routeChange = () =>{ 
      let path = `/stockinfo/${prop.id}`; 
      navigate(path);
    }
return (
    <div
                style={{
                  fontSize: 20,
                  textAlign: "center",
                  height: 100,
                }}
              >
                This is a detailed panel for {prop.name}.
              <div>
               <button className="button bluebutton" onClick={() => {
                routeChange();
                //tableRef.current.onToggleDetailPanel(
                 // [rowData.tableData.id],
                 //</div> tableRef.current.props.detailPanel
              // )
             }} >Details</button>  </div>
            {/*
            <div> <Link to={`/stockinfo/${prop.id}`} key={prop.id} 
             className="btn btn-primary">Sign up</Link></div> 
            The following is another way to navigate using link componet
            */}
            
        
             </div>
)
}