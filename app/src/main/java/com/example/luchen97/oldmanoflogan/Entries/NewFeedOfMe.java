package com.example.luchen97.oldmanoflogan.Entries;

/**
 * Created by LUCHEN97 on 3/20/2018.
 */

public class NewFeedOfMe {
    int id_newfeed;
    int id_user_newfeed;
    String status_newfeed;
    String image_newfeed;


    public NewFeedOfMe() {
    }

    public NewFeedOfMe(int id_newfeed, int id_user_newfeed, String status_newfeed, String image_newfeed) {
        this.id_newfeed = id_newfeed;
        this.id_user_newfeed = id_user_newfeed;
        this.status_newfeed = status_newfeed;
        this.image_newfeed = image_newfeed;
    }

    public int getId_newfeed() {
        return id_newfeed;
    }

    public void setId_newfeed(int id_newfeed) {
        this.id_newfeed = id_newfeed;
    }

    public int getId_user_newfeed() {
        return id_user_newfeed;
    }

    public void setId_user_newfeed(int id_user_newfeed) {
        this.id_user_newfeed = id_user_newfeed;
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
