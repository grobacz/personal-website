import React, { useEffect, useState } from "react";
import ApiClient from '../tools/ApiClient';

interface DummyProps {
    test: string;
}

const Dummy = (props: DummyProps) => {
    const [text, setText] = useState('')

    const onClick = () => {
        fetch('/api/').then((response) => response.json()).then((content) => { setText(content.text) })
    }

    return (<>
        <button onClick={onClick}>{props.test}</button>
        <div id="test">{text}</div>
    </>)
}

export default Dummy