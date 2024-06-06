import logo from "./logo.svg";
import InputShortener from "./InputShortener";
import "./App.css";
import BackgroundAnimate from "./BackgroundAnimate";
import LinkResult from "./LinkResult";
import { useState } from "react";

function App() {
  const [inputValue, setInputValue] = useState("");
  return (
    <div className="container">
      <InputShortener setInputValue={setInputValue} />
      <BackgroundAnimate></BackgroundAnimate>
      <LinkResult inputValue={inputValue}></LinkResult>
    </div>
  );
}

export default App;
