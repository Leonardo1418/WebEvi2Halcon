## Evidence 2 — Application Logic

### Changes made
- Laravel 11 project created with Breeze authentication
- **Models:** User, Order, PhotoEvidence with full Eloquent relationships
- **Migrations:** All tables with correct data types, primary keys and foreign keys
- **Controllers:** HomeController, UserController, OrderController, PhotoEvidenceController
- **Routes:** Public routes for home/search, all dashboard routes protected with `auth` middleware
- **Seeders:** UserSeeder (1 admin + 1 per role + 10 random), OrderSeeder (20 orders)
- **Factories:** UserFactory and OrderFactory with realistic fake data
- **Views:**
  - Public: Home with invoice search, shows delivery photo or current status
  - Protected: Dashboard, Users CRUD, Orders CRUD, Archived orders with restore

### Test credentials
| Role      | Email                    | Password |
|-----------|--------------------------|----------|
| Admin     | admin@halcon.com         | password |
| Sales     | sales@halcon.com         | password |
| Warehouse | warehouse@halcon.com     | password |
| Route     | route@halcon.com         | password |
| Purchasing| purchasing@halcon.com    | password |
