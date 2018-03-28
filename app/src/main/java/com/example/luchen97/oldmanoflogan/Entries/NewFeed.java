package com.example.luchen97.oldmanoflogan.Entries;

/**
 * Created by LUCHEN97 on 3/27/2018.
 */

public class NewFeed {
    int id_newfeed;
    String avatar_user;
    String username_user;
    String status_newfeed;
    String image_newfeed;

    public NewFeed() {
    }

    public NewFeed(int id_newfeed, String avatar_user, String username_user, String status_newfeed, String image_newfeed) {
        this.id_newfeed = id_newfeed;
        this.avatar_user = avatar_user;
        this.username_user = username_user;
        this.status_newfeed = status_newfeed;
        this.image_newfeed = image_newfeed;
    }

    public int getId_newfeed() {
        return id_newfeed;
    }

    public void setId_newfeed(int id_newfeed) {
        this.id_newfeed = id_newfeed;
    }

    public String getAvatar_user() {
        return avatar_user;
    }

    public void setAvatar_user(String avatar_user) {
        this.avatar_user = avatar_user;
    }

    public String getUsername_user() {
        return username_user;
    }

    public void setUsername_user(String username_user) {
        this.username_user = username_user;
    }

    public String getStatus_newfeed() {
        return status_newfeed;
    }

    public void setStatus_newfeed(String status_newfeed) {
        this.status_newfeed = status_newfeed;
    }

    public String getImage_newfeed() {
        return image_newfeed;
    }

    public void setImage_newfeed(String image_newfeed) {
        this.image_newfeed = image_newfeed;
    }
}
