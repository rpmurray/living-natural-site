ALTER TABLE calendar_events
ADD FOREIGN KEY fk_calendars(calendar_uid)
REFERENCES calendars(uid)
ON DELETE CASCADE
ON UPDATE CASCADE;

commit;