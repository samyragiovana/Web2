const List = (props) => {
    return (
        <ul>
            {
                props.data.map((v, i) => {
                    return (<li>{v}</li>)
                })
            }
        </ul>
    );
};

export default List;