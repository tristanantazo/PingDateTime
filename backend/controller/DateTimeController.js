const getCurrentDateTime = async (req, res) => {
  let dateTimeNow = Date.now();
  res.status(200).json({ datetime: dateTimeNow });
};

module.exports = getCurrentDateTime;
