const express = require('express');
const cors = require('cors');

const app = express();
app.use(cors());
app.use(express.json());

const addressesRouter = require('./routes/addresses');

app.use('/api/addresses', addressesRouter);

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => console.log(`Server listening at http://localhost:${PORT}`));
