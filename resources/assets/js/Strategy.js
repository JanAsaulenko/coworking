function Strategy() {
  let strategy = {};

  return {
    addStrategy: function (s) {
      strategy = s;
    },
    method: function (data) {
      strategy.reserve(data)
    }
  }
}

export default Strategy