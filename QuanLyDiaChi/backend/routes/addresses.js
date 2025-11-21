const express = require('express');
const fs = require('fs');
const path = require('path');
const { v4: uuidv4 } = require('uuid');

const router = express.Router();
const DB_PATH = path.join(__dirname, '..', 'data', 'addresses.json');

function readDB() {
  try {
    const raw = fs.readFileSync(DB_PATH, 'utf8');
    return JSON.parse(raw || '[]');
  } catch (err) {
    return [];
  }
}

function writeDB(data) {
  fs.mkdirSync(path.dirname(DB_PATH), { recursive: true });
  fs.writeFileSync(DB_PATH, JSON.stringify(data, null, 2), 'utf8');
}

// GET all
router.get('/', (req, res) => {
  res.json(readDB());
});

// GET by id
router.get('/:id', (req, res) => {
  const list = readDB();
  const item = list.find(a => a.id === req.params.id);
  if (!item) return res.status(404).json({ error: 'Not found' });
  res.json(item);
});

// POST create
router.post('/', (req, res) => {
  const { name, phone, address } = req.body;
  if (!name || !phone || !address) return res.status(400).json({ error: 'Missing fields' });
  const list = readDB();
  const newItem = { id: uuidv4(), name, phone, address };
  list.push(newItem);
  writeDB(list);
  res.status(201).json(newItem);
});

// PUT update
router.put('/:id', (req, res) => {
  const list = readDB();
  const idx = list.findIndex(a => a.id === req.params.id);
  if (idx === -1) return res.status(404).json({ error: 'Not found' });
  const { name, phone, address } = req.body;
  list[idx] = { ...list[idx], name: name ?? list[idx].name, phone: phone ?? list[idx].phone, address: address ?? list[idx].address };
  writeDB(list);
  res.json(list[idx]);
});

// DELETE
router.delete('/:id', (req, res) => {
  let list = readDB();
  const before = list.length;
  list = list.filter(a => a.id !== req.params.id);
  if (list.length === before) return res.status(404).json({ error: 'Not found' });
  writeDB(list);
  res.status(204).end();
});

module.exports = router;
