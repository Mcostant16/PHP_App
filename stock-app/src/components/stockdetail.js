

export default function MaterialDetail(prop) {

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
                //tableRef.current.onToggleDetailPanel(
                 // [rowData.tableData.id],
                 //</div> tableRef.current.props.detailPanel
              // )
             }} >Details</button>
             </div>
             </div>
)
}