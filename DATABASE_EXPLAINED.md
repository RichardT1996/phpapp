# Database Storage Explained

## Where Is Your Database?

Your database lives **on your AWS EC2 server**, not in Docker Hub or in the Docker image.

Think of it like this:
- Your **website code** = A book (can be replaced with new editions)
- Your **database** = A filing cabinet (stays in the same place, keeps all your records)

---

## Simple Breakdown

### 1. Docker Image (On Docker Hub)
- Contains: Your PHP website files, Apache web server
- **Does NOT contain:** Any database data
- Gets updated: Every time you push code changes
- Like: A recipe book (instructions, but no actual food)

### 2. Database Volume (On AWS EC2)
- Contains: All your actual data (test table, user records)
- **Stays on the server:** Even when you update your code
- Gets created: Only once, then persists forever
- Like: A filing cabinet (stores real documents)

---

## What Happens When You Deploy?

```
1. Jenkins builds new website image → Pushes to Docker Hub
2. EC2 downloads new image
3. EC2 stops old website container, starts new one
4. Database container keeps running with same data
```

**Your data is safe!** Updating your code doesn't delete the database.

---

## File Locations

### On AWS EC2 Server:
```
/opt/phpapp/
  ├── docker-compose.yaml    (instructions for Docker)
  └── init.sql               (only runs first time)

/var/lib/docker/volumes/phpapp_db_data/
  └── _data/                 (YOUR DATABASE FILES ARE HERE)
      └── docker_database/
          ├── test.ibd       (test table)
          └── contacts.ibd   (contacts table)
```

---

## How init.sql Works

**First Time Only:**
1. You run `docker-compose up -d`
2. MySQL container starts fresh (empty database)
3. Looks for init.sql file
4. Runs all the SQL commands (creates tables, inserts sample data)
5. Done!

**Second Time Onwards:**
1. You run `docker-compose up -d`
2. MySQL sees data already exists
3. Skips init.sql (doesn't run it again)
4. Uses existing data

**To Reset Database:**
```bash
docker-compose down -v    # Deletes the volume
docker-compose up -d      # Fresh start, init.sql runs again
```

---

## Data Persistence

### ✅ Data Survives:
- Container restarts
- Code deployments
- Container updates
- EC2 instance restarts

### ❌ Data Deleted When:
- You run `docker-compose down -v` (removes volumes)
- You manually delete the volume
- EC2 disk fails (no backup)

---

## Quick Analogy

Think of your deployment like this:

**Your House (EC2 Server):**
- Kitchen (Website Container): Gets renovated often, new appliances installed
- File Cabinet (Database Volume): Stays in the basement, never touched
- Recipes (Docker Image): Downloaded from the internet when needed

When you update your website:
- ✅ Kitchen gets new equipment (new code)
- ✅ File cabinet stays exactly where it is (data persists)
- ✅ You can always access your old files (database unchanged)

---

## Summary

| What | Where Stored | Updates? | Contains Data? |
|------|--------------|----------|----------------|
| Website Code | Docker Hub → EC2 (temporary) | ✅ Every deploy | ❌ No |
| Database Files | EC2 Disk (permanent) | ❌ Never | ✅ Yes |
| Config Files | EC2 Disk | ✅ Every deploy | ❌ No |

**Bottom Line:** Your database sits safely on AWS EC2 and doesn't get touched when you update your code. This is by design and exactly what you want!
