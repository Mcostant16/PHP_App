import React, {useState} from "react";
import {GetStockHistory} from '../services/getstockhistory.js';
import {

  LineChart,
  Line,
  XAxis,
  YAxis,
  CartesianGrid,
  Tooltip,
  Legend
} from "recharts";

const data = [
    {
        "Symbol": "AAPL",
        "Date": "2023-01-02",
        "Open": "130.28",
        "High": "130.9",
        "Low": "124.17",
        "Close": "129.62",
        "Adj_Close": "129.422",
        "Volume": "369948500",
        "Interval_Time": "1wk"
    },
    {
        "Symbol": "AAPL",
        "Date": "2023-01-09",
        "Open": "130.47",
        "High": "134.92",
        "Low": "128.12",
        "Close": "134.76",
        "Adj_Close": "134.555",
        "Volume": "333335200",
        "Interval_Time": "1wk"
    },
    {
        "Symbol": "AAPL",
        "Date": "2023-01-16",
        "Open": "134.83",
        "High": "138.61",
        "Low": "133.77",
        "Close": "137.87",
        "Adj_Close": "137.66",
        "Volume": "271823400",
        "Interval_Time": "1wk"
    },
    {
        "Symbol": "AAPL",
        "Date": "2023-01-23",
        "Open": "138.12",
        "High": "147.23",
        "Low": "137.9",
        "Close": "145.93",
        "Adj_Close": "145.708",
        "Volume": "338655600",
        "Interval_Time": "1wk"
    },
    {
        "Symbol": "AAPL",
        "Date": "2023-01-30",
        "Open": "144.96",
        "High": "157.38",
        "Low": "141.32",
        "Close": "154.5",
        "Adj_Close": "154.264",
        "Volume": "480249700",
        "Interval_Time": "1wk"
    },
    {
        "Symbol": "AAPL",
        "Date": "2023-02-06",
        "Open": "152.57",
        "High": "155.23",
        "Low": "149.22",
        "Close": "151.01",
        "Adj_Close": "150.78",
        "Volume": "330758800",
        "Interval_Time": "1wk"
    },
    {
        "Symbol": "AAPL",
        "Date": "2023-02-13",
        "Open": "150.95",
        "High": "156.33",
        "Low": "150.85",
        "Close": "152.55",
        "Adj_Close": "152.55",
        "Volume": "316792400",
        "Interval_Time": "1wk"
    },
    {
        "Symbol": "AAPL",
        "Date": "2023-02-20",
        "Open": "150.2",
        "High": "151.3",
        "Low": "145.72",
        "Close": "146.71",
        "Adj_Close": "146.71",
        "Volume": "213742300",
        "Interval_Time": "1wk"
    },
    {
        "Symbol": "AAPL",
        "Date": "2023-02-27",
        "Open": "147.71",
        "High": "151.11",
        "Low": "143.9",
        "Close": "151.03",
        "Adj_Close": "151.03",
        "Volume": "273931100",
        "Interval_Time": "1wk"
    },
    {
        "Symbol": "AAPL",
        "Date": "2023-03-06",
        "Open": "153.79",
        "High": "156.3",
        "Low": "150.23",
        "Close": "150.59",
        "Adj_Close": "150.59",
        "Volume": "244699900",
        "Interval_Time": "1wk"
    },
    {
        "Symbol": "AAPL",
        "Date": "2023-03-10",
        "Open": "150.21",
        "High": "150.94",
        "Low": "147.85",
        "Close": "148.75",
        "Adj_Close": "148.75",
        "Volume": "40459675",
        "Interval_Time": "1wk"
    }
];

export default function Example(props) {
    //console.log(props.symbol);
  //  const [yAxisMax, setYAxisMax] = useState(maxvalue);
    const data2 = GetStockHistory(props.symbol);
   let maxvalue =  Math.max(...data2.map(o => o.Open)); //finds max y axis value so charts fit accordingly
   console.log(maxvalue)
;   //setYAxisMax(maxvalue * 1.1);
  return (
    <LineChart
      width={750}
      height={450}
      data={data2}
      margin={{
        top: 5,
        right: 30,
        left: 20,
        bottom: 5
      }}
    >
      <CartesianGrid strokeDasharray="3 3" />
      <XAxis dataKey="Date" />
      <YAxis type="number" domain={[0, maxvalue]} />
      <Tooltip />
      <Legend />
      <Line
        type="monotone"
        dataKey="Open"
        stroke="#8884d8"
        activeDot={{ r: 8}}
      />
      <Line type="monotone" dataKey="Close" stroke="#82ca9d" />
    </LineChart>
  
  );
}