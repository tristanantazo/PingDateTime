const express = require("express");
const app = express();
const dateTimerRouter = require("./router/router");
const errorHandler = require("./router/routerErrorHandler");

const port = 4139;

app.use(express.json());

app.get("/", function (req, res) {
  res.send("hello this is my api");
});

app.use("/date-time", dateTimerRouter);

// error handler middleware
app.use(errorHandler);

app.listen(port, () => {
  console.log(`Server running on port ${port}`);
});
