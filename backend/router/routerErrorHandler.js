const express = require("express");
const errorHandler = express();

errorHandler.use((req, res, next) => {
  const error = new Error("Not found");
  error.status = 404;
  next(error);
});

errorHandler.use((error, req, res, next) => {
  res.status(error.status || 500).send({
    error: {
      status: error.status || 500,
      message: error.message || "Internal Server Error",
    },
  });
});

module.exports = errorHandler;
