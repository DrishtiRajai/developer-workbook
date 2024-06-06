import { useState } from "react";

const InputShortener = ({ setInputValue }) => {
  const [value, setValue] = useState("");
  const handleClick = () => {
    setInputValue(value);
    setValue("");
  };
  return (
    <div className="inputContainer">
      <h1>
        URL<span> Shrinker</span>
      </h1>
      <div>
        <input
          type="text"
          placeholder="Paste a link here"
          value={value}
          onChange={(e) => setValue(e.target.value)}
        ></input>
        <button onClick={handleClick}>Shrinkit</button>
      </div>
    </div>
  );
};

export default InputShortener;
