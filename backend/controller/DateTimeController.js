const axios = require("axios");

const getDateApi = () => {
  return axios
    .get("http://worldtimeapi.org/api/timezone/Asia/Manila")
    .then((res) => {
      return res.data;
    })
    .catch((err) => {
      console.log("Error: ", err.message);
    });
};
const getCurrentDateTime = async (req, res) => {
  let api = await getDateApi();
  res.status(200).json({ datetime: api["datetime"] });
};

module.exports = getCurrentDateTime;
