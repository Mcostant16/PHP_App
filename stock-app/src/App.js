import logo from './logo.svg';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import './App.css';
import NavScroll from './components/navBar.js'; 
import Stocks from './pages/Stocks.js';
import Home from './pages/home.js';
import StockInfo from './pages/stockinfo.js';
import Apple from './pages/detailstocks.js';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

function App() {

  return (
    
    <Router>
    <NavScroll/>
    <ToastContainer />
    <Routes>
     <Route path='/' element={<Home/>} />
     <Route path='/stocks' element={<Stocks/>} />
     <Route path='/stockinfo' element={<StockInfo/>} />
     <Route path='/stockinfo/:symbol' element={<Apple/>} />
    </Routes>
    </Router>
  );
}

export default App;
