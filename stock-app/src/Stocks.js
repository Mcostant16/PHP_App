

function Car() {
    return <h2>Hi, I am a Car!</h2>;
  }

  function Garage() {
    return (
      <>
        <h1>Who lives in my Garage?</h1>
        <Car />
      </>
    );
  }

  export default Garage;