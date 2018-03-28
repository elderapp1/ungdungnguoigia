package com.example.luchen97.oldmanoflogan.Entries;

/**
 * Created by LUCHEN97 on 3/22/2018.
 */

public class Comment {
    int id;
    String username;
    String comment;

    public Comment() {
    }

    public Comment(int id, String username, String comment) {
        this.id = id;
        this.username = username;
        this.comment = comment;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getComment() {
        return comment;
    }

    public void setComment(String comment) {
        this.comment = comment;
    }
}
