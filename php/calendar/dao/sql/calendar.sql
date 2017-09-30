use livingnatural;

create table calendars (
    uid varchar(16) not null primary key,
    name varchar(50) not null,
    description varchar(100),
    created datetime not null,
    updated datetime not null
);

create table calendar_events (
    uid varchar(16) not null primary key,
    calendar_uid varchar(16) not null,
    title varchar(100) not null,
    description varchar(500),
    date datetime not null,
    duration INT not null,
    created datetime not null,
    updated datetime not null
);

commit;