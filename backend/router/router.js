const express = require("express");
const router = express.Router();

const getCurrentDateTime = require("../controller/DateTimeController");

router.get("/", getCurrentDateTime);

module.exports = router;
