import React, { useEffect, useState } from "react";
import { useRouteMatch } from "react-router-dom";
import ApiClient from '../tools/ApiClient';

const ApiResponse = () => {
    let { path } = useRouteMatch();
    const [result, setResult] = useState<string>('Loading ' + path + ' ...')
    useEffect(() => {
        ApiClient.test().then((result) => { setResult(result) })
    }, [result, setResult])

    return <>{result}</>;
}

export default ApiResponse