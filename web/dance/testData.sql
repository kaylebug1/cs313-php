INSERT INTO dance_selection (dance_type) VALUES ('swing');
INSERT INTO dance_selection (dance_type) VALUES ('ballroom');
SELECT * FROM dance_selection;
INSERT INTO dance (day, location) VALUES ('2017-08-07', '4561 North Way, Salt Lake City, UT');
INSERT INTO dance (day, location) VALUES ('2017-07-23', 'BYUI Hinkley, Rexburg ID');
SELECT * FROM dance;
INSERT INTO host (name) VALUES ('BYUI Social Activities');
INSERT INTO host (name, facebook) VALUES ('Swinging On Main', 'swinggingonmain@facebook.com');
INSERT INTO event (dance, host, dance_selection, title) VALUES (1,2,1,'Yall are swingin,baby');
INSERT INTO event (host, dance, dance_selection, title) VALUES (1,2,1,'Vintage night');
INSERT INTO event (host, dance, dance_selection, title) VALUES (1,2,2,'Ballroom blitz');

SELECT dance_type, day, location, title, name FROM event e
JOIN dance_selection ds ON e.dance_selection = ds.id
JOIN dance d ON e.dance = d.id
JOIN host h ON e.host = h.id;
WHERE host=1;


GROUP BY ds.id, e.id, d.day, d.location, e.title,h.name;


