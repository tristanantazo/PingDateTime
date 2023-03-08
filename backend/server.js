const express = require("express");
const app = express();
app.use(express.json());

const books = [
  { title: "Harry Potter", id: 1 },
  { title: "Twilight", id: 2 },
  { title: "Lorien Legacies", id: 3 },
];

//READ Request Handlers
app.get("/", (req, res) => {
  res.send("deee");
});

app.get("/api/books", (req, res) => {
  res.send(books);
});

const port = 3000;
app.listen(port, () => {
  console.log(`Express Js is listening port ${port}`);
});
