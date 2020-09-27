const ApiClient = {
    test: (): Promise<any> => {
        return fetch('/api/test')
            .then((result) => { result.text() })
            .then((text) => { console.log(text); return text })
            .catch(() => '')
    }
};

export default ApiClient;