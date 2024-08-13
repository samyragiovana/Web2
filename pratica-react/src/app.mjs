import List from "./components/list.mjs";

const cores = ['a','b','c'];
const App = () => {
    return (
        <div>
            <h2>Listas</h2>
            <List data = {cores} />
        </div>
    );
};
export default App;
